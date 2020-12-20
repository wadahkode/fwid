const path = require('path');
const { CleanWebpackPlugin } = require('clean-webpack-plugin');
const HtmlWebpackPlugin = require('html-webpack-plugin');
const WorkboxPlugin = require('workbox-webpack-plugin');

module.exports = {
  entry: {
    app: './src/index.js',
    style: './src/styles.js'
  },
  plugins: [
    new CleanWebpackPlugin(),
  ],
  output: {
    filename: '[name].min.js',
    path: path.resolve(__dirname, 'public/js'),
  },
  module: {
    rules: [
      {
        test: /\.(js|jsx)$/,
        use: "babel-loader"
      },
      {
        test: /\.s[ac]ss$/i,
        use: ["style-loader", "css-loader", "sass-loader"]
      }
    ]
  },
  performance: {
    hints: false, //'warning',
    //maxEntrypointSize: 4 * 1024 * 1024,
    //maxAssetSize: 10 * 1024 * 1024
  }
};