import httpClient from "../../services/httpClient";
import { useSelector } from "react-redux";
import { useEffect, useState } from "react";

export default function submit(params) {


  const answers = useSelector((state) => {
    return state.answers;
  });

  const [totalQuestionCount, setTotalQuestionCount] = useState(Object.keys(answers).length);
  const [trueAnswers,setTrueAnswers] = useState(0);

  useEffect(() => {
    
  }, []);

  return <h1>Hello</h1>;
}
