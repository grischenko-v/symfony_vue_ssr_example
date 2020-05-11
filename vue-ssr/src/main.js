import Vue from 'vue'
import App from './App.vue'

// export a factory function for creating fresh app, router and store
// instances

export function createApp(context) {
  const app = new Vue({
    render: h => h(
      App,
      {
        props: {
          title: context && context.title || 123
        }
      })
  });
  return {app};
}
