import React from "react";
import { AnswerCard } from "./AnswerCard";

const QuestionCard = ({answers,question}) => {
  return (
    <div className="cursor-pointer shadow-md  justify-between p-5  col-start-3 col-end-11 ">
      <div>
        <h2 className="text-xl font-bold">{question.question}</h2>
      </div>
      <div className="">
        {answers && answers.map(answer => {
            return <AnswerCard answer={answer} key={answer.uuid}/>
        })}
      </div>
    </div>
  );
};

export default QuestionCard;
