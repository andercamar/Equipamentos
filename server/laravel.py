import csv
import logging
import shutil
import mysql.connector
import os
import os.path
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
    arq= "papercut-print-log-2021-"
    i=9
    j=12
    # for i in range(1,13):
    # for j in range(1,12):
    logging.info('INICIANDO MES: '+str(i))
    origem = "\\\\server\\c$\\Program Files (x86)\\PaperCut Print Logger\\logs\\csv\\daily\\" + arq+str('%02d' %i)+"-"+str('%02d' %j)+".csv"
    destino = "teste\\arq.csv"
    if os.path.exists(origem):
        shutil.copy(origem,destino)
        arquivo(destino)
        banco(destino)
        logging.info('FIM')
    else:
        logging.info(origem)
        logging.error('arquivo não encontrado')
        logging.info('TERMINADO MES: '+str(i))
    logging.info('FIM')
if __name__ == '__main__':
    main()
