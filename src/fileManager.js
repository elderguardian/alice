const fs = require("fs");
const {sha256} = require("./crypto");

async function deleteExpiredFiles() {
    const files = fs.readdirSync(`${process.env.UPLOAD_DIR}/metadata`);
    const now = new Date();

    for (const file of files) {
        const fileName = file.split('.')[0];
        const metadata = getFileInformationOrNull(fileName);

        const hasDeletionDate = metadata != null && metadata.deletionDate != null;
        if (!hasDeletionDate) continue;

        const deletionDate = new Date(metadata.deletionDate);
        if (deletionDate < now) {
            fs.rmSync(`${process.env.UPLOAD_DIR}/${fileName}`);
            fs.rmSync(`${process.env.UPLOAD_DIR}/metadata/${fileName}.json`);
        }
    }
}

async function handleFileUpload(file, deletionDate, downloadPassword) {
    const fileName = (Math.random() + 1).toString(36).substring(7);
    const filePath = `${process.env.UPLOAD_DIR}/${fileName}`;
    await file.mv(filePath);

    const fileMetadataPath = `${process.env.UPLOAD_DIR}/metadata/${fileName}.json`;
    const securedPassword = downloadPassword == null ? null : await sha256(downloadPassword);

    fs.writeFileSync(fileMetadataPath, JSON.stringify({
        deletionDate, downloadPassword: securedPassword,
        extension: (file.name.split('.') ?? ['']).pop()
    }));

    return fileName.toString();
}

function getFileInformationOrNull(fileName) {
    try {
        const metadataFilePath = `${process.env.UPLOAD_DIR}/metadata/${fileName}.json`;
        const metadata = fs.readFileSync(metadataFilePath, 'utf8');
        return JSON.parse(metadata);
    } catch (e) {
        return null;
    }
}

module.exports = {
    deleteExpiredFiles,
    handleFileUpload,
    getFileInformationOrNull
}