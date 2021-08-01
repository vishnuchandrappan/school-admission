import React, { useContext } from "react";
import { DataContext } from "../services/DataService";
import { Input, Form } from "antd";

const { Item } = Form;

export const PhoneEmail = () => {
    const { phone, setPhone, email, setEmail } = useContext(DataContext);

    return (
        <>
            <Item
                name="phone"
                rules={[
                    {
                        required: true,
                    },
                ]}
                label="Phone Number"
            >
                <Input
                    value={phone}
                    onChange={setPhone}
                    type="number"
                    placeholder="+91 98765 43210"
                />
            </Item>

            <Item
                value={email}
                onChange={setEmail}
                name="email"
                label="Email Address (if any)"
            >
                <Input type="email" placeholder="potter.harry@hogwarts.in" />
            </Item>
        </>
    );
};
