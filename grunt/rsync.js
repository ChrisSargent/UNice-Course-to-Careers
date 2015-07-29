module.exports = {
    deploy: {
        options: {
            recursive: true,
            src: "./",
            dest: "~/www/unicedemo/",
            host: "stgsear1@akascia.com",
            delete: "true",
            exclude: ["node_modules", ".gitignore", "grunt", ".git", "Gruntfile.js", "*.DS_store"],
            ssh: true,
            args: ["--verbose"],
        }
    }
};
