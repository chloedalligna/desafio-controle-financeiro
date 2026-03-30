import './bootstrap';

import IMask from 'imask';

IMask(document.getElementById('value'), {
    mask: [
        { mask: '' },
        {
            mask: 'R$ num',
            lazy: false,
            blocks: {
                num: {
                    mask: Number,  // enable number mask
                    // other options are optional with defaults below
                    scale: 2,  // digits after point, 0 for integers
                    thousandsSeparator: '.',  // any single char
                    padFractionalZeros: true,  // if true, then pads zeros at end to the length of scale
                    normalizeZeros: false,  // appends or removes zeros at ends
                    radix: ',',  // fractional delimiter
                    mapToRadix: ['.'],  // symbols to process as radix
                    // additional number interval options (e.g.)
                    min: 0.01,
                    autofix: true,
                }
            }
        },
    ]
})
