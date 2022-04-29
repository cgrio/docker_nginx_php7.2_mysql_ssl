import { AddUserParams, UserModel } from "@/domain/models/user";
import { UserModelSchema } from "./models/user";

export class UserMongooseRepositoryAdapter {
    async addUserRepository(data: AddUserParams): Promise<UserModel> {
        return await UserModelSchema.create(data);
    }
}
