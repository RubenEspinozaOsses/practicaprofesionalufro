from flask import Flask, flash, request, jsonify
import magic
import PyPDF2, io, os


app = Flask(__name__)


if __name__ == '__main__':
    app.run(debug=True, host='0.0.0.0', port=5000)
    
UPLOAD_FOLDER = './uploads'
ALLOWED_EXTENSIONS = ['pdf', 'PDF']

app.secret_key = 'secret'
app.config['UPLOAD_FOLDER'] = UPLOAD_FOLDER
app.config['SESSION_TYPE'] = 'filesystem'



def allowed_file(filename):
    return '.' in filename and \
           filename.rsplit('.', 1)[1].lower() in ALLOWED_EXTENSIONS

    

@app.route('/api/pdf/upload', methods=['POST'])
def upload_file():
    #return "<p>"+str(request.files[0])+"</p>"
    file = dict(request.form)
    
    
    return "<p>" + str(file)  +  "</p>"
    #return "<p>Se recivio</p>"
    
    
    with open(file) as pdf:
        print (pdf)
    
        

        