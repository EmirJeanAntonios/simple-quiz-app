import httpClient from "../../services/httpClient";
import { useSelector } from "react-redux";
import { useEffect, useLayoutEffect, useState } from "react";
import axios from "axios";

export default function submit(params) {
  const answers = useSelector((state) => {
    return state.answers;
  });

  const [totalQuestionCount, setTotalQuestionCount] = useState(
    Object.keys(answers).length
  );
  const [trueAnswers, setTrueAnswers] = useState(0);
  const [totalAnswers, settotalAnswers] = useState(0);

  useEffect(() => {
    async function checkAnswers() {
      let response = await axios.post(
        `http://localhost:8000/api/survey/${params.slug}/check-answers`,
        {
          headers: {
            "Content-Type": "application/json",
            "Access-Control-Allow-Origin": "*",
            "Access-Control-Allow-Methods":
              "GET, POST, PATCH, PUT, DELETE, OPTIONS",
            "Access-Control-Allow-Headers":
              "Origin, Content-Type, X-Auth-Token, Authorization, Accept,charset,boundary,Content-Length",
          },
          data: {
            answers,
          },
        }
      );

      if (response.status == 404) {
        return (
          <>
            <Error statusCode={404} />
            <Footer className="mx-64" />
          </>
        )
      }

      setTrueAnswers(response.data.correctAnswers);
      settotalAnswers(response.data.totalQuestions);
    }
    checkAnswers();
  }, []);

  return (
    <h1 className="text-center text-xl font-bold py-12">
      {trueAnswers} / {totalAnswers} Cevapladınız!
    </h1>
  );
}

export async function getServerSideProps({ params }) {
  try {
    const questionare = await httpClient.axiosInstance.get(
      `/survey/${params.slug}`
    );

    return {
      props: {
        slug: params.slug,
      },
    };
  } catch (error) {
    return {
      notFound: true,
    };
  }
}
