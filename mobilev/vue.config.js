const path = require('path')
const webpack = require('webpack')
var HtmlWebpackPlugin = require('html-webpack-plugin')

function resolve(dir) {
	return path.join(__dirname, dir)
}

// vue.config.js
const vueConfig = {
	configureWebpack: {
		// webpack plugins
		plugins: [
			// Ignore all locale files of moment.js
			new webpack.IgnorePlugin(/^\.\/locale$/, /moment$/),
			new HtmlWebpackPlugin({
				title:process.env.TITLE,
				template: '../resources/views/mobile.blade.php',
				filename: '../wap.blade.php',
			})
		],
	},

	chainWebpack: (config) => {
		config.resolve.alias
			.set('@$', resolve('src'))
	},

	css: {
		loaderOptions: {
			less: {
				modifyVars: {
					// less vars，customize ant design theme

					// 'primary-color': '#F5222D',
					// 'link-color': '#F5222D',
					// 'border-radius-base': '4px'
				},
				// DO NOT REMOVE THIS LINE
				javascriptEnabled: true
			}
		}
	},

	devServer: {
		// development server port 8000
		port: 8002
		// If you want to turn on the proxy, please remove the mockjs /src/main.jsL11
		// proxy: {
		//   '/api': {
		//     target: 'https://mock.ihx.me/mock/5baf3052f7da7e07e04a5116/antd-pro',
		//     ws: false,
		//     changeOrigin: true
		//   }
		// }
	},
	publicPath:'/mobilev',
	outputDir: '../public/mobilev',
	/*indexPath: process.env.NODE_ENV === 'production'
		? '../resources/views/admin.blade.php'
		: '../index.html',*/
	// disable source map in production
	productionSourceMap: false,
	lintOnSave: false,
	// babel-loader no-ignore node_modules/*
	transpileDependencies: []
}

module.exports = vueConfig
