import bun_plugin_tailwind from "bun-plugin-tailwind"

await Bun.build({
    target: "browser",
    entrypoints: ["./src/**/*.html"],
    outdir: "./dist",
    minify: true,
    splitting: true,
    plugins: [bun_plugin_tailwind],
});
