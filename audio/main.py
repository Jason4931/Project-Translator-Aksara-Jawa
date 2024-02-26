import whisper
from fastapi import FastAPI
import uvicorn

app = FastAPI()

@app.get('/audio')
def transcribe(audio):
    model = whisper.load_model("tiny")
    result = model.transcribe(audio)
    return result["text"]

if __name__ == "__main__":
    uvicorn.run(app, host="127.0.0.1", port=8000)