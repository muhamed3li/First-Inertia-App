import { createApp, h } from "vue";
import { Head, Link, createInertiaApp } from "@inertiajs/vue3";
import Layout from "./Shared/Layout.vue";

createInertiaApp({
    resolve: (name) => {
        const pages = import.meta.glob("./Pages/**/*.vue", { eager: true });
        let page = pages[`./Pages/${name}.vue`];
        if (page.default.layout === undefined) {
            page.default.layout = Layout;
        }
        return page;
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .component("Link", Link)
            .component("Head", Head)
            .mount(el);
    },

    title: (title) => `My App - ${title}`,
    progress: {
        delay: 250,
        color: "red",
        includeCSS: true,
        showSpinner: true,
    },
});
