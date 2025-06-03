import bun_plugin_tailwind from "bun-plugin-tailwind"

import { readdir } from "node:fs/promises";
import path from 'node:path';

const srcFiles = (await readdir('./src/', { recursive: true }))
    .map(file => path.resolve('./src', file));

await Bun.build({
    target: "browser",
    entrypoints: srcFiles,
    outdir: "./dist",
    minify: true,
    //splitting: true,
    plugins: [bun_plugin_tailwind],
});
