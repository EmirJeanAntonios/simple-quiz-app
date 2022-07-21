import { configureStore } from '@reduxjs/toolkit'
import answerReducer from './features/answers/answerSlice'

export const store = configureStore({
  reducer: {
    answers: answerReducer
  },
})

