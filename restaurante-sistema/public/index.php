<?php
require_once '../rutas/rutas.php';document.addEventListener('DOMContentLoaded', () => {
    cargarCategorias();

    const formCategoria = document.getElementById('formCategoria');
    formCategoria.addEventListener('submit', async (e) => {
        e.preventDefault();
        const nombre = document.getElementById('nombre').value;
        await fetch('/categorias', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ nombre })
        });
        formCategoria.reset();
        cargarCategorias();
    });
});

async function cargarCategorias() {
    const response = await fetch('/categorias');
    const categorias = await response.json();
    const tbody = document.querySelector('#tablaCategorias tbody');
    tbody.innerHTML = '';
    categorias.forEach(categoria => {
        const fila = `
            <tr>
                <td>${categoria.id}</td>
                <td>${categoria.nombre}</td>
                <td>
                    <button onclick="editarCategoria(${categoria.id}, '${categoria.nombre}')">Editar</button>
                    <button onclick="eliminarCategoria(${categoria.id})">Eliminar</button>
                </td>
            </tr>
        `;
        tbody.innerHTML += fila;
    });
}

async function eliminarCategoria(id) {
    await fetch(`/categorias/${id}`, { method: 'DELETE' });
    cargarCategorias();
}

async function editarCategoria(id, nombreActual) {
    const nuevoNombre = prompt('Nuevo nombre de la categoría:', nombreActual);
    if (nuevoNombre) {
        await fetch(`/categorias/${id}`, {
            method: 'PUT',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ nombre: nuevoNombre })
        });
        cargarCategorias();
    }
}