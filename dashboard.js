const { app, BrowserWindow } = require('electron');

// Pencereyi oluşturacak fonksiyon
function createWindow() {
    const win = new BrowserWindow({
        width: 800,
        height: 600,
        webPreferences: {
            nodeIntegration: true // node.js entegrasyonu
        }
    });

    // Yerel XAMPP uygulamanızın URL'si
    win.loadURL('http://localhost/hastane');
}

// Electron uygulaması hazır olduğunda pencereyi oluştur
app.whenReady().then(createWindow);

// Tüm pencereler kapatıldığında uygulamayı bitir
app.on('window-all-closed', () => {
    if (process.platform !== 'darwin') {
        app.quit();
    }
});
