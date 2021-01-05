const path = require('path');
const { CleanWebpackPlugin } = require('clean-webpack-plugin');
const HtmlWebpackPlugin = require('html-webpack-plugin');
const WorkboxPlugin = require('workbox-webpack-plugin');

module.exports = {
  entry: {
    app: './build/index.js',
    all: './node_modules/@fortawesome/fontawesome-free/js/all.js',
    style: './build/styles.js'
  },
  //target: "es15",
  plugins: [
    new CleanWebpackPlugin()
  ],
  output: {
    filename: '[name].min.js',
    path: path.resolve(__dirname, 'public/js'),
  },
  module: {
    rules: [
      {
        test: /\.(js|jsx)$/,
        exclude: /node_modules/,
        use: {
          loader: "babel-loader",
          options: {
            presets: ['@babel/preset-env', '@babel/preset-typescript']
          }
        }
      },
      {
        test: /\.s[ac]ss$/i,
        exclude: /node_modules/,
        use: ["style-loader", "css-loader", "sass-loader"]
      },
    ]
  },
  resolve: {
    fallback: {
      //fs: false,
      //path: false
      //url: false
    },
  },
  performance: {
    hints: false, //'warning',
    maxEntrypointSize: 4 * 1024 * 1024,
    maxAssetSize: 10 * 1024 * 1024
  }
};