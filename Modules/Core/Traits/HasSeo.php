<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 5/22/24, 12:42 PM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Core\Traits;

use Modules\Core\Entities\Site;
use Spatie\SchemaOrg\BaseType;
use Spatie\SchemaOrg\CollectionPage;
use Spatie\SchemaOrg\Graph;
use Spatie\SchemaOrg\Organization;
use Spatie\SchemaOrg\Person;
use Spatie\SchemaOrg\Schema;
use Spatie\SchemaOrg\WebPage;
use Spatie\SchemaOrg\WebSite;

trait HasSeo
{
    private $metaTitle;

    private $metaKeywords;

    private $metaDescription;

    public function getMetaTags(string $titlePostfix = ''): array
    {

        $metaTags = $this->metaTags()->withTranslation()->get();

        $this->metaTitle = $metaTags?->where('meta_key', 'title')->first()?->meta_value;
        $this->metaKeywords = $metaTags->where('meta_key', 'keywords')->first()?->meta_value;
        $this->metaDescription = $metaTags->where('meta_key', 'description')->first()?->meta_value;

        $tags = [];

        $tags[] = "<title>$this->metaTitle $titlePostfix</title>";
        $tags[] = "<meta property='og:title' content='$this->metaTitle  $titlePostfix'>";

        $tags[] = "<meta name='description' content='$this->metaDescription'>";
        $tags[] = "<meta property='og:description' content='$this->metaDescription'>";

        $tags[] = "<meta name='keywords' content='$this->metaKeywords'>";

        $tags[] = "<meta property='og:url' content='".url()->current()."'>";

        $tags[] = '<meta property="og:type" content="website">';

        if (method_exists($this, 'getOgImageUrl')) {
            $tags[] = "<meta property='og:image' content='".$this->getOgImageUrl('cover-og.jpg')."'>";
        }

        return $tags;
    }

    public function getPageSchemaOrg()
    {
        $graph = new Graph();

        $graph = $this->getWebsiteSchema($graph);
        $graph = $this->getWebpageSchema($graph, $this->metaTitle, $this->metaDescription, asset(config('filesystems.disks.favicons.path').'android-icon-192x192.png'), $this->created_at, $this->updated_at);

        $graph = $this->getBreadcrumbSchema(
            $graph,
            [$this->metaTitle => ''],
            Schema::webPage()->identifier(url()->current().'#webpage')
        );

        return $graph->toScript();
    }

    public function getCollectionPageSchemaOrg()
    {
        $graph = new Graph();

        $graph = $this->getWebsiteSchema($graph);
        $graph = $this->getCollectionPageSchema($graph, $this->metaTitle, $this->metaDescription, asset(config('filesystems.disks.favicons.path').'android-icon-192x192.png'), $this->created_at, $this->updated_at);

        $graph = $this->getBreadcrumbSchema(
            $graph,
            [$this->metaTitle => ''],
            Schema::webPage()->identifier(url()->current().'#webpage')
        );

        return $graph->toScript();
    }

    public function getPersonSchemaOrg(string $titlePostfix = '')
    {
        $graph = new Graph();

        $graph = $this->getWebsiteSchema($graph);
        $graph = $this->getWebpageSchema($graph, $this->metaTitle.$titlePostfix, $this->metaDescription, $this->getCoverImageUrl('cover-lg.webp'), $this->created_at, $this->updated_at);

        $fullName = explode(' ', $this->name, 2);
        $graph->person()
            ->givenName(current($fullName))
            ->if(isset($fullName[1]), function (Person $person) use ($fullName) {
                $person->familyName($fullName[1]);
            })
            ->if($this->birthdate, function (Person $person) {
                $person->birthDate($this->birthdate);
            })
            ->if($this->hometown, function (Person $person) {
                $person->birthPlace($this->hometown);
            })
            ->if($this->deathPlace, function (Person $person) {
                $person->deathDate($this->deathPlace);
            })
            ->if($this->deathDate, function (Person $person) {
                $person->deathPlace($this->deathDate);
            })
            ->if($this->height, function (Person $person) {
                $person->height($this->height);
            })
            ->if($this->weight, function (Person $person) {
                $person->weight($this->weight);
            })
            ->author(request()->getHost())
            ->mainEntityOfPage(Schema::webPage()->identifier(url()->current().'#webpage'))
            ->name($this->name)
            ->identifier(url()->current().'#person')
            ->description(strlen($this->description) > 160 ? substr($this->description, 0, 150).'...' : $this->description)
            ->keywords($this->metaKeywords)
            ->url(url()->current())
            ->inLanguage(app()->currentLocale())
            ->image($this->getPersonalImageUrl('person-lg.webp'))
            ->thumbnailUrl($this->getPersonalImageUrl('person-sm.webp'))
            ->dateCreated($this->released_at);

        $graph = $this->getBreadcrumbSchema(
            $graph,
            [$this->metaTitle => ''],
            Schema::webPage()->identifier(url()->current().'#webpage')
        );

        return $graph->toScript();
    }

    public function getMovieSchemaOrg(string $titlePostfix = '')
    {
        $graph = new Graph();

        $graph = $this->getWebsiteSchema($graph);
        $graph = $this->getWebpageSchema($graph, $this->metaTitle.$titlePostfix, $this->metaDescription, $this->getCoverImageUrl('cover-lg.webp'), $this->created_at, $this->updated_at);

        $publishers = [];

        foreach ($this->publishers as $publisher) {
            $publishers[] = Schema::organization()->identifier(route('frontSide.company', [$publisher->slug]).'#organization');
            $graph->organization($publisher->slug, function (Organization $organization) use ($publisher) {
                $organization
                    ->identifier(route('frontSide.company', [$publisher->slug]).'#organization')
                    ->name($publisher->name)
                    ->description($publisher->description)
                    ->url(route('frontSide.company', [$publisher->slug]));
            });
        }

        $graph->movie()
            ->author(request()->getHost())
            ->isPartOf(Schema::webPage()->identifier(url()->current().'#webpage'))
            ->mainEntityOfPage(Schema::webPage()->identifier(url()->current().'#webpage'))
            ->name($this->name)
            ->identifier(url()->current().'#VideoGame')
            ->description(strlen($this->description) > 160 ? substr($this->description, 0, 150).'...' : $this->description)
            ->keywords($this->metaKeywords)
            ->url(url()->current())
            ->inLanguage(app()->currentLocale())
            ->publisher($publishers)
            ->image($this->getCoverImageUrl('cover-original.webp'))
            ->thumbnailUrl($this->getCoverImageUrl('cover-sm.webp'))
            ->dateCreated($this->released_at);

        $graph = $this->getBreadcrumbSchema(
            $graph,
            [$this->metaTitle => ''],
            Schema::webPage()->identifier(url()->current().'#webpage')
        );

        return $graph->toScript();
    }

    public function getSchemaOrg()
    {
        $graph = new Graph();

        $graph = $this->getWebsiteSchema($graph);
        $graph = $this->getWebpageSchema($graph, $this->metaTitle, $this->metaDescription, $this->getCoverImageUrl('cover-lg.webp'), $this->created_at, $this->updated_at);

        $publishers = [];

        foreach ($this->publishers as $publisher) {
            $publishers[] = Schema::organization()->identifier(route('frontSide.company', [$publisher->slug]).'#organization');
            $graph->organization($publisher->slug, function (Organization $organization) use ($publisher) {
                $organization
                    ->identifier(route('frontSide.company', [$publisher->slug]).'#organization')
                    ->name($publisher->name)
                    ->description($publisher->description)
                    ->url(route('frontSide.company', [$publisher->slug]));
            });
        }

        $graph->book()
            ->author(request()->getHost())
            ->isPartOf(Schema::webPage()->identifier(url()->current().'#webpage'))
            ->mainEntityOfPage(Schema::webPage()->identifier(url()->current().'#webpage'))
            ->name($this->name)
            ->identifier(url()->current().'#book')
            ->description(strlen($this->description) > 160 ? substr($this->description, 0, 150).'...' : $this->description)
            ->keywords($this->metaKeywords)
            ->url(url()->current())
            ->inLanguage(app()->currentLocale())
            ->publisher($publishers)
            ->image($this->getCoverImageUrl('cover-original.webp'))
            ->thumbnailUrl($this->getCoverImageUrl('cover-sm.webp'))
            ->dateCreated($this->released_at);

        $graph = $this->getBreadcrumbSchema(
            $graph,
            [$this->category->name => route('frontSide.category.books', [$this->category->slug]), $this->name => ''],
            Schema::webPage()->identifier(url()->current().'#webpage')
        );

        return $graph->toScript();
    }

    public function getWebsiteSchema($graph): Graph
    {
        $homePage = cache()->rememberForever('home-page', function () {
            return Site::with(['metaTags'])->where('path', '/')->first();
        });

        $homePageTags = $homePage?->metaTags;

        // $searchAction = Schema::searchAction()
        //     ->target(route('frontSide.search') . '?query={search_term_string}')
        //     ->setProperty('query-input', 'required name=search_term_string');

        return $graph->webSite(route('frontSide.home').'#website', function (Website $website) use ($homePageTags) {
            $website->identifier(route('frontSide.home').'#website')
                ->name(config(('app.name')))
                ->description($homePageTags?->where('meta_key', 'description')?->first()?->meta_value)
                // ->potentialAction($searchAction)
                ->url(route('frontSide.home'))
                ->inLanguage(app()->currentLocale());
        });
    }

    public function getWebpageSchema($graph, $title, $description, $page_image, $created_at = null, $updated_at = null): Graph
    {
        $viewAction = Schema::viewAction()
            ->target(url()->current());

        return $graph->webPage(url()->current().'#webpage', function (WebPage $webpage) use ($viewAction, $title, $description, $page_image, $created_at, $updated_at) {
            $webpage->identifier(url()->current().'#webpage')
                ->name($title)
                ->headline($title)
                ->description($description)
                ->if($page_image, function (WebPage $webPage) use ($page_image) {
                    $webPage->primaryImageOfPage($page_image);
                })

                ->url(url()->current())
                ->potentialAction($viewAction)
                ->isPartOf(Schema::webSite()->identifier(route('frontSide.home').'#website'))
                ->inLanguage(app()->currentLocale())
                ->if($created_at, function (WebPage $webPage) use ($created_at) {
                    $webPage->datePublished($created_at);
                })
                ->if($updated_at, function (WebPage $webPage) use ($updated_at) {
                    $webPage->dateModified($updated_at);
                });
        });
    }

    public function getCollectionPageSchema($graph, $title, $description, $page_image, $created_at = null, $updated_at = null): Graph
    {
        $viewAction = Schema::viewAction()
            ->target(url()->current());

        return $graph->collectionPage(url()->current().'#collectionPage', function (CollectionPage $collectionPage) use ($viewAction, $title, $description, $page_image, $created_at, $updated_at) {
            $collectionPage->identifier(url()->current().'#collectionPage')
                ->name($title)
                ->headline($title)
                ->description($description)
                ->if($page_image, function (CollectionPage $collectionPage) use ($page_image) {
                    $collectionPage->primaryImageOfPage($page_image);
                })

                ->url(url()->current())
                ->potentialAction($viewAction)
                ->isPartOf(Schema::webSite()->identifier(route('frontSide.home').'#website'))
                ->inLanguage(app()->currentLocale())
                ->if($created_at, function (CollectionPage $collectionPage) use ($created_at) {
                    $collectionPage->datePublished($created_at);
                })
                ->if($updated_at, function (CollectionPage $collectionPage) use ($updated_at) {
                    $collectionPage->dateModified($updated_at);
                });
        });
    }

    public function getBreadcrumbSchema($graph, $urls, BaseType $partOfSchema): Graph
    {
        $listItems = [];
        $listItems[] = Schema::listItem()
            ->position(1)
            ->name('Home')
            ->item(route('frontSide.home'))
            ->url(route('frontSide.home'));

        $position = 2;

        foreach ($urls as $key => $value) {
            $listItems[] = Schema::listItem()
                ->position($position++)
                ->name($key)
                ->item($value)
                ->url($value);
        }

        return $graph->breadcrumbList(url()->current().'#breadcrumb', function ($breadcrumb) use ($listItems, $partOfSchema) {
            $breadcrumb
                ->name('breadcrumb')
                ->identifier(url()->current().'#breadcrumb')
                ->itemListElement($listItems)
                ->isPartOf($partOfSchema);
        });
    }
}
