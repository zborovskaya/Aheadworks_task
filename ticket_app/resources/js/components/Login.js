import { useForm } from "react-hook-form";


export default function Login() {
    const { register, handleSubmit, formState: { errors } } = useForm();
    const onSubmit = (data) => {
        fetch(`/api/login`, {
            method: 'POST',
            headers: {
                Accept: 'application/json',
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(data),
        })
            .then(response => response.json())
            .then(function (body) {
                if (body.token === undefined) {
                    console.log("have not token")
                    return;
                }
                localStorage.setItem("token", body.token);
                console.log("token", body.token)
                window.location.href ="/form";
            });
    };

    return (

        <form onSubmit={handleSubmit(onSubmit)}>
            <label>Login</label>
            <p>
                <input {...register("email")} />
            </p>
            <label>Password</label>
            <p>
                <input {...register("password")} />
            </p>
            {errors.exampleRequired && <span>This field is required</span>}
            <input type="submit" />
        </form>
    );
}
