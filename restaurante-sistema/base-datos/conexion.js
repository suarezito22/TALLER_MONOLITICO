const { Pool } = require('pg');

const pool = new Pool({
    user: 'usuario',
    host: 'localhost',
    database: 'restaurante',
    password: 'contraseña',
    port: 5432,
});

module.exports = pool;