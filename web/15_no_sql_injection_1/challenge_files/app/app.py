from flask import Flask, send_from_directory, render_template, redirect, request, session, json
import pymongo
import os, logging

app = Flask(__name__, static_url_path="")
app.secret_key = os.urandom(32)
client = pymongo.MongoClient("mongodb://localhost:27017/")
db = client.get_database("secure_login")

@app.route('/')
def index():
    return render_template("index.html", error = request.args.get("error", ""))

@app.route('/api/login', methods=["POST"])
def login():
    login_creds = request.get_json()
    if not "username" in login_creds or not "password" in login_creds:
        response = app.response_class(
            response = json.dumps({"url" : "/?error=You need to give a username and password!"}),
            mimetype = "application/json",
            status = 200
        )
        return response
    user_records = db["users"]
    try:
        if user_records.find_one(login_creds):
            session["logged_in"] = True
            response = app.response_class(
                response = json.dumps({"url" : "/admin"}),
                mimetype = "application/json",
                status = 200
            )
            return response
    except:
        response = app.response_class(
            response = json.dumps({"url" : "/?error=Something went wrong trying to access the database!"}),
            mimetype = "application/json",
            status = 200
        )
        return response

    response = app.response_class(
        response = json.dumps({"url" : "/?error=Incorrect username and/or password!"}),
        mimetype = "application/json",
        status = 200
    )
    return response

@app.route("/admin")
def admin():
    if "logged_in" in session:
        return render_template("admin.html")
    return redirect("/")

@app.route('/assets/<path:path>')
def send_assets(path):
    return send_from_directory("assets", path)

@app.route('/images/<path:path>')
def send_images(path):
    return send_from_directory("images", path)

if __name__ == "__main__":
    port = 1007
    app.run(host="0.0.0.0", port=port)
