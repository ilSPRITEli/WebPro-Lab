const fs = require('fs');
const readline = require('readline');


const srcpath = ('./1/employees.csv');
const outpath = ('./1/employees.json');

const readStream = fs.createReadStream(srcpath);

const readInterface = readline.createInterface(
    {input: readStream}
);

const output = [];

readInterface.on('line', (line) => {
    const row = line.split(',');

    output.push({
        id: row[0].trim(),
        gender: row[1].trim(),
        lname: row[2].trim(),
        fname: row[3].trim(),
        job: row[4].trim(),
        address: row[5].trim(),
    });
});

readInterface.on('close', () => {
    console.log('done');
    fs.writeFileSync(outpath, JSON.stringify(output, null, 4));
});
