import mysql.connector as mc
import sys

class dbConnection:
	def __init__(self, service, dbHost, dbName):
		self.service = service
		self.connection = mc.connect (host = dbHost,
                              user = "",
                              passwd = "",
                              db = dbName)
		except mc.Error as e:
			print("Error %d: %s" % (e.args[0], e.args[1]))
			sys.exit(1)
		
		cursor = connection.cursor()
		cursor.execute ("SELECT VERSION()")
		row = cursor.fetchone()
		print("server version:", row[0])
		cursor.close()
		
	def __del__(self):
		self.connection.close();
		
		
class StreckenAbschnittConnection(dbConnection):
	dbHost = ""
	dbName = ""
	service = "streckenabschnitt"
	def __init__(self):
		super().__init__(service, dbHost, dbName)
	def getStreckenAbschnitt(self, fields, condition):
		cursor = connection.cursor()
		
		cursor.execute("SELECT " + fields + " FROM '" + self.service + "' WHERE " + condition)
		result = cursor.fetchall() 
		return result

		cursor.close()
			
class WetterdatenConnection(dbConnection):
	dbHost = ""
	dbName = ""
	service = "wetterdaten"
	def __init__(self):
		super().__init__(service, dbHost, dbName)
	def getWetterDaten(self, fields, condition):
		cursor = connection.cursor()
		
		cursor.execute("SELECT " + fields + " FROM '" + self.service + "' WHERE " + condition)
		result = cursor.fetchall() 
		return result

		cursor.close()
		
class CorrelationDB(dbConnection):
	dbHost = ""
	dbName = ""
	service = "correlationTable"
	def __init__(self):
		super().__init__(service, dbHost, dbName)
	def setColumnForAbschnitt(abschnitt, keys, values):
		cursor = connection.cursor()

		cursor.execute('INSERT INTO `'. self.service . "`(" + keys + ") VALUES (" + values + ") WHERE corID = '" + abschnitt + "'"
		cursor.close()
		
class DatabaseController():
	SACon = StreckenAbschnittConnection()
	WDCon = WetterdatenConnection()
	CorCon = CorrelationDB()
	def setColumnForAbschnitt(abschnitt, column, value):
		CorCon.setColumn(abschnitt, column, value)
		
	def getWetterDaten(fields, condition)
		WDCon.getWetterDaten(fields, condition)
		
	def getStreckenAbschnitt(fields, condition)
		SACon.getStreckenAbschnitt(fields, condition)
	
	