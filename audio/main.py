import whisper
from fastapi import FastAPI

app = FastAPI()
@app.get('/audio')
def transcribe(audio):
    model = whisper.load_model("tiny")
    result = model.transcribe(audio)
    # print(result["text"])
    return result["text"]