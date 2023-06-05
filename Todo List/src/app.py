from flask import Flask, render_template, request, redirect, url_for

app = Flask(__name__, static_url_path='/static')

tasks = []

@app.route('/', methods=['GET', 'POST'])
def index():
    if request.method == 'POST':
        task_text = request.form['task']
        task_id = len(tasks) + 1
        tasks.append({'id': task_id, 'text': task_text, 'completed': False})
        return redirect(url_for('index'))

    enumerated_tasks = [(idx, task) for idx, task in enumerate(tasks)]
    return render_template('index.html', enumerated_tasks=enumerated_tasks)

@app.route('/complete_all', methods=['POST'])
def complete_all():
    for task in tasks:
        task['completed'] = True
    return redirect(url_for('index'))

@app.route('/delete/<int:task_id>', methods=['GET'])
def delete(task_id):
    for i, task in enumerate(tasks):
        if task['id'] == task_id:
            del tasks[i]
            break
    return redirect(url_for('index'))

@app.route('/update_completion', methods=['POST'])
def update_completion():
    data = request.get_json()
    task_id = data['task_id']
    completed = data['completed']
    tasks[task_id]['completed'] = completed
    return jsonify(success=True)

if __name__ == '__main__':
    app.run(debug=True)
