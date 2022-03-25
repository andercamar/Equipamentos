import csv
import logging
import shutil
import mysql.connector
import os
import os.path
import datetime
from configu import configu

logging.basicConfig(filename='app.log',format='%(asctime)s - %(message)s', level=logging.INFO)

def conecta():
    try:
        conn = mysql.connector.connect(**configu)
        return conn
    except Exception as e:
        print (e)

def desconecta(conn):
    conn.close()

def banco(destino):
    logging.info('BANCO')
    try:
        with open(destino, 'r', encoding='mbcs') as arq:
            reader = csv.DictReader(arq, delimiter=",", quotechar = ',', quoting=csv.QUOTE_NONE)
            ins = 'INSERT INTO printer_reports(`Time`,`User`,`Pages`,`Copies`,`Printer`,`Paper Size`,`Duplex`,`file_name`) VALUES'
            for row in reader:
                row['Time'] = row['Time'].replace('"', '')
                ins = ins+ "('"+row['Time']+"','"+row['User']+"','"+row['Pages']+"','"+row['Copies']+"','"+row['Printer']+"','"+row['Paper Size']+"','"+row['Duplex']+"','"+row['Document Name']+"'),"
            ins = ins[:-1] + ";"
            insere(ins)
    except Exception as e:
        logging.info(e)

def insere(ins):
    try:
        logging.info('INSERE')
        conn = conecta()
        mycursor = conn.cursor()
        mycursor.execute(ins)
        conn.commit()
        desconecta(conn)
    except Exception as e:
        logging.info(e)

def arquivo(destino):
    try:
        with open(destino, 'r', encoding='mbcs') as arq:
            data = arq.read().splitlines(True)
        with open(destino, 'w', encoding='mbcs') as fout:
            fout.writelines(data[1:])
            fout.close()
            arq.close()
    except Exception as e:
        logging.info(e)

def main():
    # Time,User,Pages,Copies,Printer,Document Name,Client,Paper Size,Language,Height,Width,Duplex,Grayscale,Size
    arq= "papercut-print-log-20"
    data = datetime.datetime.today()
    data = data - datetime.timedelta(days=1)
    print(data.strftime("%y-%m-%d"))
    print(arq+str(data.strftime("%y-%m-%d")))
    arq = arq+str(data.strftime("%y-%m-%d"))
    logging.info('INICIANDO ARQUIVO: ' + arq)
    origem = "\\\\server\\c$\\Program Files (x86)\\PaperCut Print Logger\\logs\\csv\\daily\\" +arq+".csv"
    destino = "teste\\arq.csv"
    if os.path.exists(origem):
        shutil.copy(origem,destino)
        arquivo(destino)
        banco(destino)
        logging.info('FIM')
    else:
        logging.info(origem)
        logging.error('arquivo não encontrado')
        logging.info('TERMINADO AQUIVO: '+arq)
    logging.info('FIM')
if __name__ == '__main__':
    main()
