module.exports = {
    mode: 'production',
    devtool: 'source-map',
    entry: ['@babel/polyfill', './src/js/main.js'],
    output: {
        filename: 'bundle.js'
    },
    module: {
        rules: [{
            test: /\.js$/,
            exclude: /node_modules/,
            use: {
                loader: "babel-loader",
                options: {
                    presets: ['@babel/preset-env']
                }
            }
        }]
    }
}
