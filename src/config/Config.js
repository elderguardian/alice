module.exports = class Config {
    constructor(specs) {
        this.uploadDir = specs.uploadDir;
        this.uploadPassword = specs.uploadPassword;
        this.port = specs.port;
    }

    getUploadDir() {
        return this.uploadDir;
    }

    getUploadPassword() {
        return this.uploadPassword;
    }

    getPort() {
        return this.port;
    }
}