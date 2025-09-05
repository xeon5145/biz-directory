function encryptData(data,key) {
    var encrypted = CryptoJS.AES.encrypt(data, key);
    return encrypted.toString();
}

function decryptData(data,key) {
    var decrypted = CryptoJS.AES.decrypt(data, key);
    return decrypted.toString(CryptoJS.enc.Utf8);
}