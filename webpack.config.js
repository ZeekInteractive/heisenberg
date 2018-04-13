require('dotenv').config({path: 'variables.env'})
const path = require('path')
const MiniCssExtractPlugin = require('mini-css-extract-plugin')
const BrowserSyncPlugin = require('browser-sync-webpack-plugin')
const autoprefixer = require('autoprefixer')

let prefix = ''
if (process.env.NODE_ENV === 'production') {
  prefix = '.min'
}

const postcss = {
  loader: 'postcss-loader',
  options: {
    sourceMap: true,
    plugins () {
      return [autoprefixer({browsers: 'last 2 versions'})]
    }
  }
}

const sass = {
  loader: 'sass-loader',
  options: {
    sourceMap: true,
    outputStyle: 'compressed',
  }
}

const config = {
  entry: [
    'babel-polyfill',
    './assets/main.js'
  ],
  output: {
    filename: `build${prefix}.js`,
    path: path.resolve(__dirname, '_dist'),
  },
  mode: process.env.NODE_ENV,
  externals: {
    jquery: 'jQuery'
  },
  module: {
    rules: [
      {
        test: /\.js$/,
        loader: 'babel-loader',
        exclude: /node_modules\/(?!(foundation-sites)\/).*/ // https://github.com/zurb/foundation-sites/issues/10161#issuecomment-309503202
      },
      {
        test: /\.(png|jpg|jpeg|gif|svg)$/,
        loader: 'file-loader',
        options: {
          name: '[name].[ext]',
          emitFile: false,
          context: '',
          publicPath: '../../assets/img/',
        }
      },
      {
        test: /\.scss$/,
        use: [MiniCssExtractPlugin.loader, 'css-loader', postcss, sass]
      }
    ]
  },
  resolve: {
    alias: {
      '@': path.resolve('assets')
    }
  },
  plugins: [
    new MiniCssExtractPlugin('[name].css'),
    new BrowserSyncPlugin(
      {
        injectChanges: true,
        proxy: process.env.LOCAL_URL || 'http://heisenberg.dev',
        files: [
          '**/*.php'
        ],
        port: process.env.PORT || 3000,
        notify: false
      }
    )
  ]
}

module.exports = config