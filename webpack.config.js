const path                      = require('path');
//const ExtractTextPlugin       = require('extract-text-webpack-plugin');
//const UglifyJSPlugin            = require('uglifyjs-webpack-plugin');
const OptimizeCssAssetsPlugin   = require('optimize-css-assets-webpack-plugin');
const BrowserSyncPlugin         = require('browser-sync-webpack-plugin');
const CssEntryPlugin            = require('css-entry-webpack-plugin');

const config = {
	entry: {
		sab_gutenberg_editor_script: './assets/src/js/sab_gutenberg_editor_script.js',
		sab_gutenberg_editor_style: './assets/src/scss/sab_gutenberg_editor_style.scss',
	},
	output: {
		filename: 'js/[name].js',
		path: path.resolve(__dirname, 'assets')
	},
	module: {
		rules: [
			{
				test: /\.scss$/,
		/* 		use: ExtractTextPlugin.extract({
					fallback: 'style-loader', */
				  	use: ['css-loader?url=false', 'postcss-loader', 'sass-loader']
				//}),
			},
			{
				test: /\.js$/,
				exclude: /(node_modules)/,
				loader: 'babel-loader',
			/* 	query: {
					presets: ['es2015', 'babel']
				} */
			}
		]
	},
	plugins: [
		new CssEntryPlugin({
			output: {
			  filename: "/css/[name].css"
			}
		}),
		//new ExtractTextPlugin('/css/[name].css'),
		new BrowserSyncPlugin({
			proxy: 'localhost/',
		    port: 3000,
		    files: [ '**/*.php' ],
		    ghostMode: {
		        clicks: false,
		        location: false,
		        forms: false,
		        scroll: false
		    },
		    injectChanges: true,
		    logFileChanges: true,
		    logLevel: 'debug',
		    logPrefix: 'wepback',
		    notify: false,
		    reloadDelay: 0
		})
	]
};

//If true JS and CSS files will be minified
if (process.env.NODE_ENV === 'production') {
	config.plugins.push(
		//new UglifyJSPlugin(),
		new OptimizeCssAssetsPlugin()
	);
}

module.exports = config;
