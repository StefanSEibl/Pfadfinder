import mysql.connector as mc
import sys

class dbConnection:
        def __init__(self, service, dbHost, dbName, dbUser = "", dbPass = ""):
                self.service = service
                self.connection = mc.connect(host = dbHost, user = dbUser, passwd = dbPass, db = dbName)
                cursor = connection.cursor()
                cursor.execute ("SELECT VERSION()")
                row = cursor.fetchone()
                print("server version:", row[0])
                cursor.close()
                
        def __del__(self):
                self.connection.close();
                
                
class StreckenAbschnittConnection(dbConnection):
        def __init__(self):
                dbHost = ""
                dbName = ""
                service = "streckenabschnitt"
                super().__init__(service, dbHost, dbName)
        def getStreckenAbschnitt(self, fields, condition):
                cursor = connection.cursor()
                
                cursor.execute("SELECT " + fields + " FROM '" + self.service + "' WHERE " + condition)
                result = cursor.fetchall() 
                return result

                cursor.close()
                        
class WetterdatenConnection(dbConnection):
        def __init__(self):
                dbHost = ""
                dbName = ""
                service = "wetterdaten"
                super().__init__(service, dbHost, dbName)
        def getWetterDaten(self, fields, condition):
                cursor = connection.cursor()
                
                cursor.execute("SELECT " + fields + " FROM '" + self.service + "' WHERE " + condition)
                result = cursor.fetchall() 
                return result

                cursor.close()
                
class CorrelationDB(dbConnection):
        def __init__(self):
                dbHost = ""
                dbName = ""
                service = "correlationTable"
                super().__init__(service, dbHost, dbName)
        def setColumnForAbschnitt(abschnitt, keys, values):
                cursor = connection.cursor()

                cursor.execute('INSERT INTO `'+ self.service + "`(" + keys + ") VALUES (" + values + ") WHERE corID = '" + abschnitt + "'")
                
                cursor.close()
                
class DatabaseController():
        def __init__():
                SACon = StreckenAbschnittConnection()
                WDCon = WetterdatenConnection()
                CorCon = CorrelationDB()
        def setColumnForAbschnitt(abschnitt, column, value):
                CorCon.setColumn(abschnitt, column, value)
                
        def getWetterDaten(fields, condition):
                WDCon.getWetterDaten(fields, condition)
                
        def getStreckenAbschnitt(fields, condition):
                SACon.getStreckenAbschnitt(fields, condition)
        
        
