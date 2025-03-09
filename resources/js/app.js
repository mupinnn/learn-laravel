import '../css/app.customer.css';

import Alpine from 'alpinejs';

const cpuBrands = [
    {
        name: 'AMD',
        id: 'amd',
    },
    {
        name: 'Intel',
        id: 'intel',
    },
];

const cpus = [
    {
        name: 'AMD Ryzen 5 5600',
        socket: 'AM4',
        brand: 'amd',
    },
    {
        name: 'AMD Ryzen 7 9700X',
        socket: 'AM5',
        brand: 'amd',
    },
    {
        name: 'Intel Core i9-12900F',
        socket: 'LGA1700',
        brand: 'intel',
    },
    {
        name: 'Intel Core i7-10700K',
        socket: 'LGA1200',
        brand: 'intel',
    },
];

const mobos = [
    {
        name: 'Gigabyte B550M DS3H AC R2',
        socket: 'AM4',
    },
    {
        name: 'ASRock B550M Pro4',
        socket: 'AM4',
    },
    {
        name: 'ASRock B650M-HDV/M.2',
        socket: 'AM5',
    },
    {
        name: 'Gigabyte Z790 Aorus Elite X',
        socket: 'LGA1700',
    },
    {
        name: 'Gigabyte H510M K V2 (rev. 2.0)',
        socket: 'LGA1200',
    },
];

document.addEventListener('alpine:init', () => {
    Alpine.store('parts', {
        cpuBrand: {
            value: null,
            options: cpuBrands,
        },

        cpu: {
            value: null,
            options: cpus,
        },

        motherboard: {
            value: null,
            options: mobos,
        },

        onChange(type) {
            switch (type) {
                case 'cpuBrand':
                    this.cpu.value = null;
                    this.cpu.options = cpus.filter((c) => {
                        return c.brand === this.cpuBrand.value;
                    });

                    this.motherboard.value = null;
                    break;
                case 'cpu':
                    this.motherboard.value = null;
                    this.motherboard.options = mobos.filter((m) => {
                        return m.socket === this.cpu.value;
                    });
                    break;
            }
        },
    });
});

Alpine.start();

window.Alpine = Alpine;
