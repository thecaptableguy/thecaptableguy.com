---
mode: 'agent'
model: 'Claude Sonnet 4'
tools: ['edit', 'search', 'runCommands', 'runTasks', 'fetch']
description: 'Generate a new Insights post based on the .md file that describes its contents'
---
Your goal is to generate a new html page in the "insights" directory that matches the visual style of the other posts in the same #insights/ directory by following the general instructions set for this workspace, located in the default .github/instrructions subdirectory in this project.

If no .md file is given in the prompt, ask for it because it is the basis for the content. The file must be an .md file in the subdirectory corresponding to the insights blog path of the server.

Use the file to determine the title, subtitle, and main content of the post.