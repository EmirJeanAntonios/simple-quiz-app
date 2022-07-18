import httpClient from "../../services/httpClient";

export default function questionare({ questionare }) {
  return <h1>Hello World</h1>;
}

export async function getServerSideProps({ params }) {
  try {
    const data = await httpClient.axiosInstance.get(`/survey/${params.slug}`);
    console.log(data.data)
    return {
      props:{
        data: data.data
      }
    }
  } catch (error) {
    return {
      notFound: true,
    };
  }
}
