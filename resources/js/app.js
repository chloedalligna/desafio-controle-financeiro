import './bootstrap';

import IMask from 'imask';

const valueInput = document.getElementById('value');

let mask = IMask(valueInput, {
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
                    signed: false,
                    min: 0.01,
                    autofix: true,
                }
            }
        },
    ]
})

mask.updateValue();



