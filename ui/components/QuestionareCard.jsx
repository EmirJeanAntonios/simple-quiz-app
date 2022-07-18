import React, { useEffect, useState } from "react";

const QuestionareCard = ({ questionare }) => {
  const [createdDate, setCreatedDate] = useState("");

  useEffect(() => {
    setCreatedDate(new Date(questionare.created_at).toLocaleDateString());
  }, []);

  return (
    <div className="shadow-md flex items-center justify-between p-5 max-w-3xl col-start-2 col-end-4 ">
      <div>
        <h2 className="text-xl font-bold">{questionare.name}</h2>
      </div>
      <div className="">
        <p>Created At : {createdDate}</p>
      </div>
    </div>
  );
};

export default QuestionareCard;
