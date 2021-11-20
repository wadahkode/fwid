// Generated using webpack-cli https://github.com/webpack/webpack-cli

const path = require("path");
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const WorkboxWebpackPlugin = require("workbox-webpack-plugin");

const isProduction = process.env.NODE_ENV == "production";

const stylesHandler = isProduction
  ? MiniCssExtractPlugin.loader
  : "style-loader";

const config = {
  entry: "./app.js",
  output: {
    path: path.resolve(__dirname, "public/dist"),
    filename: "[name].js",
    clean: true
  },
  plugins: [
    // Add your plugins here
    // Learn more about plugins from https://webpack.js.org/configuration/plugins/
    new MiniCssExtractPlugin({
      filename: "styles.css",
      chunkFilename: "styles.css",
    }),
  ],
  performance: {
    hints: "warning", // enum
    maxAssetSize: 20000000, // int (in bytes),
    maxEntrypointSize: 10000000, // int (in bytes)
    assetFilter: function (assetFilename) {
      // Function predicate that provides asset filenames
      return assetFilename.endsWith(".css") || assetFilename.endsWith(".js");
    },
  },
  optimization: {
    runtimeChunk: "single",
  },
  module: {
    rules: [
      {
        test: /\.(js|jsx)$/i,
        loader: "babel-loader",
      },
      {
        test: /\.css$/i,
        use: [stylesHandler, "css-loader", "postcss-loader"],
      },
      {
        test: /\.(eot|svg|ttf|woff|woff2|png|jpg|gif)$/i,
        type: "asset",
      },

      // Add your rules for custom modules here
      // Learn more about loaders from https://webpack.js.org/loaders/
    ],
  },
};

module.exports = () => {
  if (isProduction) {
    config.mode = "production";

    config.plugins.push(
      new MiniCssExtractPlugin({
        filename: "styles.css",
        chunkFilename: "styles.css",
      })
    );

    config.plugins.push(
      new WorkboxWebpackPlugin.GenerateSW({
        maximumFileSizeToCacheInBytes: 10000000,
        clientsClaim: true,
        skipWaiting: true,
      })
    );
  } else {
    config.mode = "development";
  }
  return config;
};
