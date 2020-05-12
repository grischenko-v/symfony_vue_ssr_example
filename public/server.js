const bundle = require('./dist/server.bundle.js');
const renderer = require('vue-server-renderer').createRenderer();

const app = bundle.default({
	title: context.title
});

app.then(app => {
	renderer.renderToString(app, function (err, html) {
		if (err) {
			console.log(err);
		}
		// see PHP
		dispatch(html);
	})
});



