
/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 6/2/24, 9:34 AM.
 * @Project: Jumla
 ************************************************/

import Cleave from 'cleave.js/dist/cleave.min'

export default (el, { expression}, {evaluateLater, effect}) => {
    const getContent = evaluateLater(expression)

    effect(() => {
        getContent(content => {
            if (typeof content == 'object')
                el.__x_cleave = new Cleave(el, content)
            else console.warn('Input mask config should be object')
        })
    })
}
