import Config from './config.js';

const Grid = {
    config: null,
    init(config: typeof Config) {
        this.config = config;
    },
};

export default Grid;
