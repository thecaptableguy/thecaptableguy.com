import bun_plugin_tailwind from "bun-plugin-tailwind"
import { readdirSync } from "node:fs";
import path from "node:path";

const srcFiles = readdirSync('./src', { recursive: true, withFileTypes: true })
    .filter(dirent => dirent.isFile() && dirent.name.endsWith('.html'))
    .map(file => path.join(file.parentPath, file.name));

await Bun.build({

    entrypoints: srcFiles,
    outdir: "./dist",
    packages: "bundle",
    naming: {
        // entry: '[dir]/[name].[ext]',
        // asset: '[name]-[hash].[ext]',
        chunk: '[dir]/[name]-[hash].[ext]'
    },
    target: "browser",
    minify: true,
    splitting: true,
    plugins: [bun_plugin_tailwind],
});
