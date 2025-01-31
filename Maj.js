const { exec } = require('child_process');
const pathToPhp = 'C:\\chemin\\vers\\php.exe'; // Mettre à jour ce chemin
const scriptPath = 'C:\\Users\\amahp\\Desktop\\ESGIS AVEDJI COURS\\IRT2\\3eme Semestre\\UML\\TP site web\\Souweba\\php\\get_chambre.php';

exec(`"${pathToPhp}" "${scriptPath}"`, (error, stdout, stderr) => {
    if (error) {
        console.error(`Erreur: ${error.message}`);
        return;
    }
    if (stderr) {
        console.error(`Erreur: ${stderr}`);
        return;
    }
    console.log(`Sortie: ${stdout}`);
});
