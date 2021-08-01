import React, { useContext } from "react";
import { DataContext } from "../services/DataService";
import { Form, Radio } from "antd";

const { Item } = Form;

export const Gender = () => {
    const { gender, setGender } = useContext(DataContext);

    return (
        <Item
            name="gender"
            label="Gender"
            rules={[
                {
                    required: true,
                },
            ]}
        >
            <Radio.Group onChange={setGender} value={gender}>
                <Radio value={"female"}>Female</Radio>
                <Radio value={"male"}>Male</Radio>
            </Radio.Group>
        </Item>
    );
};
