import React, { useContext } from "react";
import { DataContext } from "../services/DataService";
import { Form, DatePicker } from "antd";

const { Item } = Form;

export const DOB = () => {
    const { setDob } = useContext(DataContext);

    return (
        <Item
            name="dob"
            label="Date of birth"
            rules={[
                {
                    required: true,
                },
            ]}
        >
            <DatePicker placeholder="Date of birth" onChange={setDob} />
        </Item>
    );
};
