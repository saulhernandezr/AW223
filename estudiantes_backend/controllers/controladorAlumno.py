from flask import Blueprint, request, jsonify
from Models.modelEstudiante import *

controladorAlumnoBP= Blueprint('controladorAlumno',__name__)

""" ruta para arranque del servidor """
@controladorAlumnoBP.route('/')
def inicio():
    return "hola soy el backend de alumno"

""" ruta para insert """
@controladorAlumnoBP.route('/guardarAlumno' , methods=['POST'])
def guardar():
    nombreReq=request.form.get('txtNombre','').strip()
    carreraReq=request.form.get('txtCarrera','').strip()

    try:
        insertarEstudiante(nombreReq,carreraReq)
        return jsonify({"Completado":"estudiante guardado"}),200
    
    except Exception as e:
        print(f"Error: {e}")
        return jsonify({"Error": str(e)}),500


""" ruta consultar alumno """
@controladorAlumnoBP.route('/consultarAlumnos', methods=['GET'])
def consultaAll():
    try:
        alumnos=selectAll()
        return jsonify(alumnos),200
    except Exception as e:
        print(f"error: {e}")
        return jsonify({"error": str(e)}),500

""" ruta para eliminar alumno """
@controladorAlumnoBP.route('/eliminarAlumno', methods=['PUT'])
def borrar():
    id=request.form.get('id','').strip()
    try:
        softDeleteEstudiante(id)
        return jsonify({"Completado":"Alumno borrado"}),200
    except Exception as e:
        print(f"Error: {e}")
        return jsonify({"Error": str(e)}),500



""" ruta consultar todo """
@controladorAlumnoBP.route('/consultaTodo')
def consultatodo():
    return 'se consultaron todos los alumnos'



""" ruta para actualizar """
@controladorAlumnoBP.route('/actualizarAlumno', methods=['PUT'])
def actualizar():
    idReq = request.form.get('id', '').strip()
    nombreReq = request.form.get('txtNombre', '').strip()
    carreraReq = request.form.get('txtCarrera', '').strip()
    if not idReq or not nombreReq or not carreraReq:
        return jsonify({"Error": "Envía id, txtNombre y txtCarrera"}), 400
    try:
        actualizados = actualizarEstudiante(idReq, nombreReq, carreraReq)
        if actualizados == 0:
            return jsonify({"Error": "No se encontró un alumno activo con ese id"}), 404

        return jsonify({"Completado": "Estudiante actualizado"}), 200
    except Exception as e:
        print(f"Error: {e}")
        return jsonify({"Error": str(e)}), 500

""" ruta para eliminar """
@controladorAlumnoBP.route('/eliminarAlumno', methods=['DELETE'])
def eliminar():
    return 'se borro el alumno'


""" ruta para consultar por id """
@controladorAlumnoBP.route('/consultaAlumno/<int:id>', methods=['GET'])
def consultarPorId(id):
    alumno = selectById(id)
    if alumno is None:
        return jsonify({"Error": "no se encontro un alumno con ese id"}), 404
    return jsonify({
        "id": alumno[0],
        "nombre": alumno[1],
        "carrera": alumno[2]
    }), 200

