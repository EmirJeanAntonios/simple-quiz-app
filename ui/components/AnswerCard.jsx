import React, { useId, useReducer } from "react";
import { useDispatch, useSelector } from "react-redux";
import { addAnswer } from "../redux/features/answers/answerSlice";

export const AnswerCard = ({ answer }) => {
  const id = useId();

  const dispatch = useDispatch();
  const answers = useSelector(state => {
    return state.answers
  })
  const updateAnswer = e => {
    let answer = {}
    answer[e.target.name] = e.target.value;
    
    dispatch(addAnswer({
      answer
    }))
  }

  return (
    <div className="py-4 flex gap-4">
      <input type="radio" name={answer.question_uuid} value={answer.uuid} id={id} onChange={updateAnswer}/>
      <label htmlFor={id}>{answer.answer}</label>
    </div>
  );
};
