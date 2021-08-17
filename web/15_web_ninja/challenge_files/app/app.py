from flask import Flask, send_from_directory, render_template, redirect, request, session, render_template_string
import os, logging

app = Flask(__name__, static_url_path="")
app.secret_key = os.urandom(32)

SIGNUP_TEMPLATE = """
{{% extends 'base.html' %}}

{{% block content %}}
<h2>🥷 Thanks for Becoming a Web Ninja! 🥷</h2>
<img src="/images/ninjagang.jpg" />
<p>We will send an email to {email} soon about the course!</p>
{{% endblock %}}
"""

FAILED_SIGNUP = """
{% extends 'base.html' %}
{% block content %}
<p>Missing email in the request :(</p>
{% endblock %}
"""

@app.route('/')
def index():
    return render_template("index.html")

@app.route('/signup', methods=["POST"])
def signup():
    email = request.form.get("email", "")
    if email == "":
        return render_template_string(FAILED_SIGNUP)
    return render_template_string(SIGNUP_TEMPLATE.format(email=email))

@app.route('/assets/<path:path>')
def send_assets(path):
    return send_from_directory("assets", path)

@app.route('/images/<path:path>')
def send_images(path):
    return send_from_directory("images", path)

if __name__ == "__main__":
    port = 1008
    app.run(host="0.0.0.0", port=port)
