import sys
from rembg import remove
# from PIL import Image

img_file = sys.argv[1]


#OUI, BIEN SPECIFIER LE CHEMIN SI ON LANCE LA COMMANDE SHELL DANS UN FICHIER QUI N'EST PAS AU MEME NIVEAU QUE LE FICHIER PYTHON A EXECUTER
input_path = "../imgs/"+img_file
output_path = "../imgs_rembg/"+img_file


with open(input_path, 'rb') as i:
    with open(output_path, 'wb') as o:
        input = i.read()
        output = remove(input)
        o.write(output)