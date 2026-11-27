from app import mysql 

""" funcion para consultar todo """
def selectAll():
    cursor= mysql.connection.cursor()
    cursor.execute("SELECT * FROM tb_alumnos WHERE state=1 ")
    consulta = cursor.fetchall()
    cursor.close()
    return consulta


""" funcion para insertar  """
def insertarEstudiante(nombre, carrera):
    cursor=mysql.connection.cursor()
    cursor.execute("INSERT INTO tb_alumnos(nombre,carrera) VALUES(%s,%s)",(nombre,carrera))
    mysql.connection.commit()
    cursor.close()

""" funcion para eliminar """
def softDeleteEstudiante(id):
    cursor=mysql.connection.cursor()
    cursor.execute("UPDATE tb_alumnos SET state= 0 WHERE id= %s",(id))
    mysql.connection.commit()
    cursor.close()

""" funcion para actualizar """
def actualizarEstudiante(id, nombre, carrera):
    cursor=mysql.connection.cursor()
    cursor.execute("UPDATE tb_alumnos SET nombre=%s, carrera=%s WHERE id=%s AND state=1",(nombre, carrera, id))
    mysql.connection.commit()
    cursor.close()
    return cursor.rowcount
    
    
""" consultar por id """
def selectById(id):
    cursor = mysql.connection.cursor()
    try:
        cursor.execute(
            "SELECT id, nombre, carrera FROM tb_alumnos WHERE id=%s AND state=1",
            (id,)
        )
        return cursor.fetchone()
    finally:
        cursor.close()